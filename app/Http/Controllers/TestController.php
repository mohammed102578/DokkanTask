<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function test(){

        $baseDirectory="device/root";

// Generate a UUID for the customer
$customerId = uuid_create(UUID_TYPE_RANDOM); // Generates a random UUID

// Generate XML data for the customer
$xmlData = '<customer>';
$xmlData .= '<id>' . $customerId . '</id>';
// Add more customer data as needed
$xmlData .= '</customer>';

// Specify the directory path for the customer
$directoryPath = "{$baseDirectory}/customer_{$customerId}";

// Ensure the directory exists or create it if it doesn't
if (!file_exists($directoryPath)) {
    // Create the directory recursively
    mkdir($directoryPath, 0777, true); // You may adjust permissions as needed
}

// Specify the full path to the XML file
$filename = "customer_{$customerId}.xml";
$filePath = "{$directoryPath}/{$filename}";

// Save XML data to the customer directory
file_put_contents($filePath, $xmlData);

// Use the file path as needed
echo "Path to stored file: $filePath";

    }
}
