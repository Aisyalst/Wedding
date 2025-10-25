<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full bg-white rounded-lg shadow-xl p-8">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">QR Code Generation Test</h1>
        
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
            <p class="text-blue-800">
                <strong>✅ Success!</strong> QR code generation is working properly.
            </p>
        </div>
        
        <div class="text-center mb-6">
            <div class="inline-block p-6 bg-white border-4 border-gray-300 rounded-lg shadow-md">
                {!! $qrCode !!}
            </div>
        </div>
        
        <div class="space-y-4">
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-600 mb-2"><strong>Encoded URL:</strong></p>
                <code class="text-sm bg-gray-800 text-green-400 px-3 py-2 rounded block break-all">
                    {{ $testUrl }}
                </code>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('test.qr.download') }}" 
                   class="bg-blue-600 text-white px-6 py-3 rounded-lg text-center font-semibold hover:bg-blue-700 transition">
                    📥 Download QR Code
                </a>
                <button onclick="window.location.reload()" 
                        class="bg-gray-600 text-white px-6 py-3 rounded-lg text-center font-semibold hover:bg-gray-700 transition">
                    🔄 Regenerate
                </button>
            </div>
        </div>
        
        <div class="mt-8 border-t pt-6">
            <h2 class="text-xl font-semibold mb-4">How to Test:</h2>
            <ol class="list-decimal list-inside space-y-2 text-gray-700">
                <li>Scan the QR code above with your phone's camera or QR scanner app</li>
                <li>Or click "Download QR Code" to save it</li>
                <li>The QR code contains the URL shown above</li>
                <li>Test with a real guestbook submission to see the full flow</li>
            </ol>
        </div>
        
        <div class="mt-6 bg-green-50 border border-green-200 rounded-lg p-4">
            <h3 class="font-semibold text-green-800 mb-2">✨ Implementation Details:</h3>
            <ul class="text-sm text-green-700 space-y-1">
                <li>• Package: Milon Barcode (v12.0.0)</li>
                <li>• Format: QR Code (PNG/SVG)</li>
                <li>• Auto-download after form submission</li>
                <li>• Attendance page with full details</li>
            </ul>
        </div>
    </div>
</body>
</html>
