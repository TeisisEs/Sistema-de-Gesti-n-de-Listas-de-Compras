<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras - {{ $list->title }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
            padding: 30px;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
        }
        
        .header h1 {
            font-size: 32px;
            margin-bottom: 5px;
        }
        
        .header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .info-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid #667eea;
        }
        
        .info-section h2 {
            color: #667eea;
            font-size: 20px;
            margin-bottom: 10px;
        }
        
        .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        
        .info-label {
            font-weight: bold;
            min-width: 120px;
            color: #555;
        }
        
        .info-value {
            color: #333;
        }
        
        .products-section {
            margin-top: 30px;
        }
        
        .products-section h2 {
            color: #333;
            font-size: 22px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 3px solid #667eea;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }
        
        thead {
            background: #667eea;
            color: white;
        }
        
        thead th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
        }
        
        tbody tr {
            border-bottom: 1px solid #e0e0e0;
        }
        
        tbody tr:hover {
            background: #f8f9fa;
        }
        
        tbody td {
            padding: 12px;
            font-size: 14px;
        }
        
        .product-name {
            font-weight: 600;
            color: #333;
        }
        
        .product-desc {
            font-size: 12px;
            color: #777;
            margin-top: 3px;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        .quantity-badge {
            display: inline-block;
            background: #e0e7ff;
            color: #667eea;
            padding: 4px 12px;
            border-radius: 12px;
            font-weight: 600;
        }
        
        .total-row {
            background: #667eea !important;
            color: white !important;
            font-weight: bold;
        }
        
        .total-row td {
            padding: 15px 12px;
            font-size: 16px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            background: #fff3cd;
            border-radius: 8px;
            color: #856404;
        }
        
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #777;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }
        
        .footer strong {
            color: #667eea;
        }
    </style>
</head>
<body>
    
    <!-- Header -->
    <div class="header">
        <h1>📋 ShopList Pro</h1>
        <p>Sistema de Gestión de Compras</p>
    </div>
    
    <!-- Información de la Lista -->
    <div class="info-section">
        <h2>Información de la Lista</h2>
        <div class="info-row">
            <span class="info-label">Título:</span>
            <span class="info-value">{{ $list->title }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Fecha:</span>
            <span class="info-value">
                {{ $list->due_date ? \Carbon\Carbon::parse($list->due_date)->format('d/m/Y') : 'Sin fecha definida' }}
            </span>
        </div>
        @if($list->notes)
        <div class="info-row">
            <span class="info-label">Notas:</span>
            <span class="info-value">{{ $list->notes }}</span>
        </div>
        @endif
        <div class="info-row">
            <span class="info-label">Generado:</span>
            <span class="info-value">{{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</span>
        </div>
    </div>
    
    <!-- Productos -->
    <div class="products-section">
        <h2>Productos ({{ $list->products->count() }})</h2>
        
        @if($list->products->isEmpty())
            <div class="empty-state">
                <p><strong>⚠️ Esta lista no tiene productos agregados</strong></p>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="text-right">Precio Unit.</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list->products as $product)
                        @php
                            $subtotal = $product->price * $product->pivot->quantity;
                        @endphp
                        <tr>
                            <td>
                                <div class="product-name">{{ $product->name }}</div>
                                @if($product->description)
                                    <div class="product-desc">{{ $product->description }}</div>
                                @endif
                            </td>
                            <td class="text-right">${{ number_format($product->price, 2) }}</td>
                            <td class="text-center">
                                <span class="quantity-badge">{{ $product->pivot->quantity }}</span>
                            </td>
                            <td class="text-right">${{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="total-row">
                        <td colspan="3" class="text-right">TOTAL:</td>
                        <td class="text-right">${{ number_format($total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        @endif
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <p><strong>ShopList Pro</strong> - Sistema de Gestión de Compras</p>
        <p>Desarrollado con Laravel & DomPDF</p>
    </div>
    
</body>
</html>