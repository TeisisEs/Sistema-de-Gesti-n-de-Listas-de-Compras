{{-- resources/views/lists/pdf.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras - {{ $list->title }}</title>
    
    {{-- Incluir estilos modulares --}}
    @include('lists.pdf-styles')
</head>
<body>
    
    <!-- Marca de Agua -->
    <div class="watermark">SHOPLIST PRO</div>
    
    <!-- Header Corporativo -->
    <div class="document-header">
        <div class="header-content">
            <div class="header-left">
                <div class="company-logo">
                    <div class="company-logo-text"> ShopList Pro</div>
                </div>
                <h1 class="document-title">Lista de Compras</h1>
                <p class="document-subtitle">Reporte Detallado de Productos y Costos</p>
            </div>
            <div class="header-right">
                <div style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 6px; text-align: center;">
                    <div style="font-size: 10px; opacity: 0.9; margin-bottom: 3px;">DOCUMENTO</div>
                    <div style="font-size: 20px; font-weight: bold; line-height: 1;">#{{ str_pad($list->id, 4, '0', STR_PAD_LEFT) }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Información de la Lista -->
    <div class="info-grid">
        <div class="info-row">
            <div class="info-cell info-label">Título de Lista:</div>
            <div class="info-cell info-value"><strong>{{ $list->title }}</strong></div>
        </div>
        <div class="info-row">
            <div class="info-cell info-label">Fecha Programada:</div>
            <div class="info-cell info-value">
                {{ $list->due_date ? \Carbon\Carbon::parse($list->due_date)->format('d/m/Y') : 'Sin fecha definida' }}
            </div>
        </div>
        <div class="info-row">
            <div class="info-cell info-label">Fecha de Generación:</div>
            <div class="info-cell info-value">{{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</div>
        </div>
        <div class="info-row">
            <div class="info-cell info-label">Estado:</div>
            <div class="info-cell info-value">
                <span class="status-badge"> Activa</span>
            </div>
        </div>
        <div class="info-row">
            <div class="info-cell info-label">Total de Productos:</div>
            <div class="info-cell info-value"><strong>{{ $list->products->count() }}</strong> artículos</div>
        </div>
    </div>
    
    <!-- Notas (si existen) -->
    @if($list->notes)
    <div class="notes-section">
        <div class="notes-title"> Notas Adicionales</div>
        <div class="notes-content">{{ $list->notes }}</div>
    </div>
    @endif
    
    <!-- Sección de Productos -->
    <div class="section-header">
        <h2 class="section-title">
            Detalle de Productos 
            <span class="section-count">({{ $list->products->count() }} items)</span>
        </h2>
    </div>
    
    @if($list->products->isEmpty())
        <div class="empty-state">
            <div class="empty-state-icon"></div>
            <p class="empty-state-text">Esta lista no contiene productos</p>
        </div>
    @else
        <!-- Tabla de Productos -->
        <table class="products-table">
            <thead>
                <tr>
                    <th style="width: 5%; text-align: center;">#</th>
                    <th style="width: 45%; text-align: left;">Producto</th>
                    <th style="width: 18%; text-align: right;">Precio Unit.</th>
                    <th style="width: 14%; text-align: center;">Cantidad</th>
                    <th style="width: 18%; text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list->products as $index => $product)
                    @php
                        $subtotal = $product->price * $product->pivot->quantity;
                    @endphp
                    <tr>
                        <td class="text-center" style="color: #a0aec0; font-weight: 600;">
                            {{ $index + 1 }}
                        </td>
                        <td>
                            <div class="product-name">{{ $product->name }}</div>
                            @if($product->description)
                                <div class="product-description">{{ $product->description }}</div>
                            @endif
                        </td>
                        <td class="text-right price-cell">${{ number_format($product->price, 2) }}</td>
                        <td class="text-center">
                            <span class="quantity-badge">{{ $product->pivot->quantity }}</span>
                        </td>
                        <td class="text-right subtotal-cell">${{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Sección de Totales -->
        <div class="total-section">
            <div class="subtotal-row">
                <div class="subtotal-label">Subtotal:</div>
                <div class="subtotal-value">${{ number_format($total, 2) }}</div>
            </div>
            <div class="subtotal-row">
                <div class="subtotal-label">IVA (0%):</div>
                <div class="subtotal-value">$0.00</div>
            </div>
            <div class="total-row">
                <div class="total-label">Total a Pagar:</div>
                <div class="total-value">${{ number_format($total, 2) }}</div>
            </div>
        </div>
    @endif
    
    <!-- Footer -->
    <div class="document-footer">
        <p class="footer-company">ShopList Pro - Sistema de Gestión de Compras</p>
        <p class="footer-tech">Desarrollado con Laravel {{ app()->version() }} & DomPDF</p>
        <p class="footer-website">www.shoplistpro.com | soporte@shoplistpro.com</p>
    </div>
    
</body>
</html>