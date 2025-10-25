<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class TestQrController extends Controller
{
    /**
     * Test QR code generation
     */
    public function testQr()
    {
        try {
            // Generate test URL
            $testUrl = route('invitation.show', ['slug' => 'test']);
            
            // Generate QR code
            $qrCode = DNS2D::getBarcodePNG($testUrl, 'QRCODE', 10, 10);
            
            // Return as download
            return response()->streamDownload(function() use ($qrCode) {
                echo base64_decode($qrCode);
            }, 'test-qr-code.png', [
                'Content-Type' => 'image/png',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'QR Code generation failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Show test QR code in browser
     */
    public function showQr()
    {
        try {
            $testUrl = route('invitation.show', ['slug' => 'test']);
            
            // Generate QR code as SVG for display
            $qrCode = DNS2D::getBarcodeSVG($testUrl, 'QRCODE', 10, 10);
            
            return view('test-qr', compact('qrCode', 'testUrl'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'QR Code generation failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
