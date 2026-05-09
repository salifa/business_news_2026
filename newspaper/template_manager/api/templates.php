<?php
/**
 * API: Save/Load Newsletter Templates
 * Handles template storage and retrieval
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'];
$templatesDir = __DIR__ . '/../saved_templates';

// Create templates directory if it doesn't exist
if (!is_dir($templatesDir)) {
    mkdir($templatesDir, 0755, true);
}

try {
    if ($method === 'POST') {
        // Save template
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (empty($input['name']) || empty($input['html'])) {
            throw new Exception('Template name and HTML are required');
        }
        
        $templateName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $input['name']);
        $templateFile = $templatesDir . '/' . $templateName . '.json';
        
        $templateData = [
            'name' => $input['name'],
            'html' => $input['html'],
            'css' => $input['css'] ?? '',
            'gjs_data' => $input['gjs_data'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        // If file exists, keep created_at
        if (file_exists($templateFile)) {
            $existing = json_decode(file_get_contents($templateFile), true);
            $templateData['created_at'] = $existing['created_at'] ?? $templateData['created_at'];
        }
        
        file_put_contents($templateFile, json_encode($templateData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        
        echo json_encode([
            'success' => true,
            'message' => 'Template saved successfully',
            'file' => $templateName . '.json'
        ]);
        
    } else if ($method === 'GET') {
        if (isset($_GET['name'])) {
            // Load specific template
            $templateName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $_GET['name']);
            $templateFile = $templatesDir . '/' . $templateName . '.json';
            
            if (!file_exists($templateFile)) {
                throw new Exception('Template not found');
            }
            
            $templateData = json_decode(file_get_contents($templateFile), true);
            
            echo json_encode([
                'success' => true,
                'data' => $templateData
            ]);
            
        } else {
            // List all templates
            $templates = [];
            $files = glob($templatesDir . '/*.json');
            
            foreach ($files as $file) {
                $data = json_decode(file_get_contents($file), true);
                $templates[] = [
                    'name' => $data['name'],
                    'file' => basename($file),
                    'updated_at' => $data['updated_at'] ?? ''
                ];
            }
            
            echo json_encode([
                'success' => true,
                'data' => $templates
            ]);
        }
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
