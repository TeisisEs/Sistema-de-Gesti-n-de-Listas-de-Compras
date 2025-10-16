{{-- resources/views/lists/pdf-styles.blade.php --}}
<style>
/* ========================================
   SHOPLIST PRO - PDF STYLES
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
    line-height: 1.6;
    padding: 20px;
    background: #f7fafc;
}

/* ===== UTILIDADES ===== */
.text-center { text-align: center; }
.text-right { text-align: right; }
.text-left { text-align: left; }
.mb-20 { margin-bottom: 20px; }
.mb-30 { margin-bottom: 30px; }

/* ===== HEADER CORPORATIVO ===== */
.document-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 30px 40px;
    margin: -20px -20px 30px -20px;
    position: relative;
    overflow: hidden;
}

.document-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

.header-content {
    position: relative;
    z-index: 1;
}

.company-logo {
    display: inline-block;
    background: white;
    padding: 12px 20px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.company-logo-text {
    font-size: 24px;
    font-weight: bold;
    color: #667eea;
    margin: 0;
}

.document-title {
    font-size: 28px;
    font-weight: bold;
    margin: 10px 0 5px 0;
    letter-spacing: -0.5px;
}

.document-subtitle {
    font-size: 14px;
    opacity: 0.95;
    font-weight: 300;
}

/* ===== GRID DE INFORMACIÓN ===== */
.info-grid {
    display: table;
    width: 100%;
    margin-bottom: 30px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
}

.info-row {
    display: table-row;
}

.info-cell {
    display: table-cell;
    padding: 14px 20px;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: middle;
}

.info-row:last-child .info-cell {
    border-bottom: none;
}

.info-label {
    font-weight: 600;
    color: #4a5568;
    width: 160px;
    background: #f7fafc;
}

.info-value {
    color: #2d3748;
    background: white;
}

/* ===== BADGE DE ESTADO ===== */
.status-badge {
    display: inline-block;
    padding: 4px 12px;
    background: #48bb78;
    color: white;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

/* ===== SECCIÓN DE PRODUCTOS ===== */
.section-header {
    background: #edf2f7;
    padding: 15px 20px;
    margin: 30px 0 20px 0;
    border-left: 4px solid #667eea;
    border-radius: 4px;
}

.section-title {
    font-size: 18px;
    font-weight: bold;
    color: #2d3748;
    margin: 0;
}

.section-count {
    font-size: 14px;
    color: #718096;
    font-weight: normal;
}

/* ===== TABLA DE PRODUCTOS ===== */
.products-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: white;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.products-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.products-table thead th {
    padding: 14px 16px;
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.products-table tbody tr {
    border-bottom: 1px solid #e2e8f0;
    transition: background 0.2s;
}

.products-table tbody tr:last-child {
    border-bottom: none;
}

.products-table tbody td {
    padding: 14px 16px;
    font-size: 13px;
}

.product-name {
    font-weight: 600;
    color: #2d3748;
    font-size: 14px;
}

.product-description {
    font-size: 11px;
    color: #718096;
    margin-top: 3px;
    font-style: italic;
}

.quantity-badge {
    display: inline-block;
    background: #edf2f7;
    color: #667eea;
    padding: 6px 14px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 13px;
    border: 2px solid #cbd5e0;
}

.price-cell {
    font-weight: 600;
    color: #2d3748;
}

.subtotal-cell {
    font-weight: 700;
    color: #2d3748;
    font-size: 14px;
}

/* ===== SECCIÓN DE TOTALES ===== */
.total-section {
    margin-top: 20px;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.subtotal-row {
    display: table;
    width: 100%;
    padding: 12px 20px;
    border-bottom: 1px solid #e2e8f0;
}

.subtotal-label {
    display: table-cell;
    text-align: right;
    color: #4a5568;
    font-weight: 500;
    padding-right: 20px;
}

.subtotal-value {
    display: table-cell;
    text-align: right;
    color: #2d3748;
    font-weight: 600;
    width: 150px;
}

.total-row {
    display: table;
    width: 100%;
    padding: 16px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.total-label {
    display: table-cell;
    text-align: right;
    color: white;
    font-weight: bold;
    font-size: 16px;
    padding-right: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.total-value {
    display: table-cell;
    text-align: right;
    color: white;
    font-weight: bold;
    font-size: 22px;
    width: 150px;
}

/* ===== ESTADO VACÍO ===== */
.empty-state {
    text-align: center;
    padding: 40px 20px;
    background: #fff5f5;
    border: 2px dashed #fc8181;
    border-radius: 8px;
    color: #c53030;
}

.empty-state-icon {
    font-size: 48px;
    margin-bottom: 15px;
}

.empty-state-text {
    font-size: 16px;
    font-weight: 600;
}

/* ===== NOTAS ADICIONALES ===== */
.notes-section {
    background: #fffaf0;
    border-left: 4px solid #ed8936;
    padding: 20px;
    margin: 30px 0;
    border-radius: 4px;
}

.notes-title {
    font-size: 14px;
    font-weight: bold;
    color: #c05621;
    margin-bottom: 8px;
    text-transform: uppercase;
}

.notes-content {
    font-size: 13px;
    color: #744210;
    line-height: 1.6;
}

/* ===== PIE DE PÁGINA ===== */
.document-footer {
    margin-top: 50px;
    padding-top: 20px;
    border-top: 2px solid #e2e8f0;
    text-align: center;
}

.footer-company {
    font-size: 13px;
    color: #4a5568;
    font-weight: 600;
    margin-bottom: 5px;
}

.footer-tech {
    font-size: 11px;
    color: #a0aec0;
}

.footer-website {
    font-size: 11px;
    color: #667eea;
    margin-top: 5px;
}

/* ===== MARCA DE AGUA ===== */
.watermark {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-45deg);
    font-size: 120px;
    color: rgba(102, 126, 234, 0.03);
    font-weight: bold;
    z-index: -1;
    pointer-events: none;
}
</style>