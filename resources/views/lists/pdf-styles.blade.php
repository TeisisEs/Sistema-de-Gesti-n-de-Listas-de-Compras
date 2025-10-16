{{-- resources/views/lists/pdf-styles.blade.php --}}
<style>
/* ========================================
   SHOPLIST PRO - PDF STYLES (COMPACTO)
   Sistema de Gestión de Compras
   ======================================== */

/* ===== RESET Y BASE ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Helvetica', 'Arial', sans-serif;
    color: #2d3748;
    line-height: 1.4;
    padding: 15px;
    background: #ffffff;
    font-size: 11px;
}

/* ===== UTILIDADES ===== */
.text-center { text-align: center; }
.text-right { text-align: right; }
.text-left { text-align: left; }

/* ===== HEADER CORPORATIVO COMPACTO ===== */
.document-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 20px 25px;
    margin: -15px -15px 20px -15px;
    position: relative;
    overflow: hidden;
}

.document-header::before {
    content: '';
    position: absolute;
    top: -30%;
    right: -5%;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
}

.header-content {
    position: relative;
    z-index: 1;
    display: table;
    width: 100%;
}

.header-left {
    display: table-cell;
    vertical-align: middle;
    width: 70%;
}

.header-right {
    display: table-cell;
    vertical-align: middle;
    width: 30%;
    text-align: right;
}

.company-logo {
    display: inline-block;
    background: white;
    padding: 8px 15px;
    border-radius: 6px;
    margin-bottom: 8px;
}

.company-logo-text {
    font-size: 18px;
    font-weight: bold;
    color: #667eea;
    margin: 0;
    line-height: 1;
}

.document-title {
    font-size: 22px;
    font-weight: bold;
    margin: 5px 0 3px 0;
    letter-spacing: -0.3px;
    line-height: 1.2;
}

.document-subtitle {
    font-size: 11px;
    opacity: 0.9;
    font-weight: 300;
    line-height: 1.2;
}

/* ===== GRID DE INFORMACIÓN COMPACTO ===== */
.info-grid {
    display: table;
    width: 100%;
    margin-bottom: 15px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    overflow: hidden;
    font-size: 10px;
}

.info-row {
    display: table-row;
}

.info-cell {
    display: table-cell;
    padding: 8px 12px;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: middle;
}

.info-row:last-child .info-cell {
    border-bottom: none;
}

.info-label {
    font-weight: 600;
    color: #4a5568;
    width: 140px;
    background: #f7fafc;
}

.info-value {
    color: #2d3748;
    background: white;
}

/* ===== BADGE DE ESTADO COMPACTO ===== */
.status-badge {
    display: inline-block;
    padding: 3px 10px;
    background: #48bb78;
    color: white;
    border-radius: 10px;
    font-size: 9px;
    font-weight: 600;
    text-transform: uppercase;
}

/* ===== SECCIÓN DE PRODUCTOS COMPACTA ===== */
.section-header {
    background: #edf2f7;
    padding: 10px 15px;
    margin: 15px 0 10px 0;
    border-left: 3px solid #667eea;
    border-radius: 3px;
}

.section-title {
    font-size: 14px;
    font-weight: bold;
    color: #2d3748;
    margin: 0;
    line-height: 1.2;
}

.section-count {
    font-size: 11px;
    color: #718096;
    font-weight: normal;
}

/* ===== TABLA DE PRODUCTOS COMPACTA ===== */
.products-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    overflow: hidden;
    font-size: 10px;
}

.products-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.products-table thead th {
    padding: 8px 10px;
    font-weight: 600;
    font-size: 9px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.products-table tbody tr {
    border-bottom: 1px solid #e2e8f0;
}

.products-table tbody tr:last-child {
    border-bottom: none;
}

.products-table tbody td {
    padding: 8px 10px;
    font-size: 10px;
}

.product-name {
    font-weight: 600;
    color: #2d3748;
    font-size: 11px;
    line-height: 1.3;
}

.product-description {
    font-size: 9px;
    color: #718096;
    margin-top: 2px;
    font-style: italic;
    line-height: 1.2;
}

.quantity-badge {
    display: inline-block;
    background: #edf2f7;
    color: #667eea;
    padding: 4px 10px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 10px;
    border: 1px solid #cbd5e0;
}

.price-cell {
    font-weight: 600;
    color: #2d3748;
}

.subtotal-cell {
    font-weight: 700;
    color: #2d3748;
    font-size: 11px;
}

/* ===== SECCIÓN DE TOTALES COMPACTA ===== */
.total-section {
    margin-top: 15px;
    background: white;
    border-radius: 6px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
}

.subtotal-row {
    display: table;
    width: 100%;
    padding: 8px 15px;
    border-bottom: 1px solid #e2e8f0;
    font-size: 10px;
}

.subtotal-label {
    display: table-cell;
    text-align: right;
    color: #4a5568;
    font-weight: 500;
    padding-right: 15px;
}

.subtotal-value {
    display: table-cell;
    text-align: right;
    color: #2d3748;
    font-weight: 600;
    width: 120px;
}

.total-row {
    display: table;
    width: 100%;
    padding: 12px 15px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.total-label {
    display: table-cell;
    text-align: right;
    color: white;
    font-weight: bold;
    font-size: 12px;
    padding-right: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.total-value {
    display: table-cell;
    text-align: right;
    color: white;
    font-weight: bold;
    font-size: 16px;
    width: 120px;
}

/* ===== ESTADO VACÍO COMPACTO ===== */
.empty-state {
    text-align: center;
    padding: 25px 15px;
    background: #fff5f5;
    border: 2px dashed #fc8181;
    border-radius: 6px;
    color: #c53030;
}

.empty-state-icon {
    font-size: 32px;
    margin-bottom: 10px;
}

.empty-state-text {
    font-size: 12px;
    font-weight: 600;
}

/* ===== NOTAS ADICIONALES COMPACTAS ===== */
.notes-section {
    background: #fffaf0;
    border-left: 3px solid #ed8936;
    padding: 12px 15px;
    margin: 15px 0;
    border-radius: 3px;
}

.notes-title {
    font-size: 10px;
    font-weight: bold;
    color: #c05621;
    margin-bottom: 5px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.notes-content {
    font-size: 10px;
    color: #744210;
    line-height: 1.4;
}

/* ===== PIE DE PÁGINA COMPACTO ===== */
.document-footer {
    margin-top: 20px;
    padding-top: 12px;
    border-top: 1px solid #e2e8f0;
    text-align: center;
}

.footer-company {
    font-size: 10px;
    color: #4a5568;
    font-weight: 600;
    margin-bottom: 3px;
}

.footer-tech {
    font-size: 8px;
    color: #a0aec0;
}

.footer-website {
    font-size: 8px;
    color: #667eea;
    margin-top: 2px;
}

/* ===== MARCA DE AGUA ===== */
.watermark {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-45deg);
    font-size: 100px;
    color: rgba(102, 126, 234, 0.02);
    font-weight: bold;
    z-index: -1;
    pointer-events: none;
}

/* ===== OPTIMIZACIÓN PARA MÚLTIPLES PÁGINAS ===== */
@page {
    margin: 15px;
}

.products-table {
    page-break-inside: auto;
}

.products-table tr {
    page-break-inside: avoid;
    page-break-after: auto;
}

.products-table thead {
    display: table-header-group;
}

.products-table tfoot {
    display: table-footer-group;
}

/* Evitar que ciertos elementos se corten entre páginas */
.info-grid,
.notes-section,
.section-header {
    page-break-inside: avoid;
}
</style>