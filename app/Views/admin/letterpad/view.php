<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($letterpad['title']) ?> - Letter Pad View</title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('favicon.ico?v=2') ?>" sizes="any">
    <!-- DejaVu Sans Font -->
    <link href="https://fonts.cdnfonts.com/css/dejavu-sans" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- html2pdf.js for 1-Click PDF Download -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        /* DejaVu Sans @font-face with local assets fallback */
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: 400;
            src: local('DejaVu Sans'), 
                 url('<?= base_url("assets/fonts/DejaVuSans.woff") ?>') format('woff'),
                 url('https://fonts.cdnfonts.com/s/107/DejaVuSans.woff') format('woff');
        }
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: italic;
            font-weight: 400;
            src: local('DejaVu Sans Oblique'), local('DejaVu Sans Italic'),
                 url('<?= base_url("assets/fonts/DejaVuSans-Oblique.woff") ?>') format('woff'),
                 url('https://fonts.cdnfonts.com/s/107/DejaVuSans-Oblique.woff') format('woff');
        }
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: 700;
            src: local('DejaVu Sans Bold'), 
                 url('<?= base_url("assets/fonts/DejaVuSans-Bold.woff") ?>') format('woff'),
                 url('https://fonts.cdnfonts.com/s/107/DejaVuSans-Bold.woff') format('woff');
        }
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: italic;
            font-weight: 700;
            src: local('DejaVu Sans Bold Oblique'), local('DejaVu Sans Bold Italic'),
                 url('<?= base_url("assets/fonts/DejaVuSans-BoldOblique.woff") ?>') format('woff'),
                 url('https://fonts.cdnfonts.com/s/107/DejaVuSans-BoldOblique.woff') format('woff');
        }

        :root {
            --primary: #5a39a8;
            --primary-navy: #2e2a70;
            --gold-accent: #e59a18;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #525659;
            margin: 0;
            padding: 0;
            color: #1e293b;
        }

        /* Top Action Toolbar (Hidden during print) */
        .toolbar {
            background-color: #2c3035;
            color: #ffffff;
            padding: 12px 24px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
        }

        .sheet-viewport {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 30px 15px 60px 15px;
            min-height: calc(100vh - 70px);
        }

        /* A4 Portrait Letter Pad (210mm x 297mm) */
        .a4-portrait {
            width: 210mm;
            min-height: 297mm;
            height: 297mm;
            background-color: #ffffff;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            box-sizing: border-box;
            overflow: hidden;
        }

        .sheet-bg-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: fill;
            z-index: 1;
            pointer-events: none;
            display: block;
        }

        /* Content Overlay: padding clears top header (ends ~41mm) and bottom footer ribbon (starts ~271mm) */
        .a4-portrait .document-inner {
            position: relative;
            z-index: 5;
            padding: 50mm 9mm 35mm 17mm;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            box-sizing: border-box;
            color: #2e2a70;
            font-family: 'DejaVu Sans', sans-serif;
        }

        /* Top Header Meta Row (To on left, Date on right) */
        .top-meta-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 22px;
            color: #2e2a70;
            font-family: 'DejaVu Sans', sans-serif;
        }

        .to-col {
            text-align: left;
        }

        .meta-label {
            font-size: 11pt;
            font-weight: 700;
            color: #2e2a70;
            line-height: 1.4;
            margin-bottom: 4px;
            font-family: 'DejaVu Sans', sans-serif;
        }

        .to-details {
            padding-left: 14px;
            line-height: 1.45;
        }

        .to-line {
            font-size: 10.5pt;
            font-weight: 700;
            color: #2e2a70;
            font-family: 'DejaVu Sans', sans-serif;
        }

        .date-col {
            margin-left: auto;
            text-align: right;
            font-size: 11pt;
            font-weight: 700;
            color: #2e2a70;
            line-height: 1.4;
            font-family: 'DejaVu Sans', sans-serif;
        }

        .date-col .ref-line {
            font-size: 9.5pt;
            font-weight: 600;
            color: #2e2a70;
            margin-top: 3px;
            font-family: 'DejaVu Sans', sans-serif;
        }

        /* Main Document Title: Left Aligned, Bold Uppercase Sans-Serif */
        .doc-title-box {
            margin: 10px 0 15px 0;
            text-align: left;
        }

        .doc-title {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14pt;
            font-weight: 700;
            color: #2e2a70;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
            line-height: 1.35;
        }

        /* Description Body: Bold/Semi-bold crisp navy text */
        .doc-body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10.5pt;
            font-weight: 700;
            line-height: 1.6;
            color: #2e2a70;
            flex-grow: 1;
        }

        .doc-body p {
            margin-bottom: 8px;
            text-align: justify;
        }

        .doc-body strong, .doc-body b {
            font-weight: 700;
            color: #2e2a70;
        }

        .doc-body ul, .doc-body ol {
            margin-bottom: 16px;
            padding-left: 24px;
        }

        .doc-body li {
            margin-bottom: 4px;
        }

        /* Document Sign-off: Left Aligned at Bottom */
        .doc-sign-off {
            margin-top: auto;
            padding-top: 20px;
            text-align: left;
            font-family: 'DejaVu Sans', sans-serif;
        }

        .sign-closing {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11pt;
            font-weight: 700;
            color: #2e2a70;
            margin-bottom: 8px;
        }

        .sign-details {
            padding-left: 14px;
            line-height: 1.45;
        }

        .sign-line-text {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10.5pt;
            font-weight: 700;
            color: #2e2a70;
        }

        /* Print Settings */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: #ffffff !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .sheet-viewport {
                padding: 0 !important;
                margin: 0 !important;
                min-height: auto !important;
            }

            .a4-portrait {
                width: 210mm !important;
                height: 297mm !important;
                box-shadow: none !important;
                margin: 0 !important;
                page-break-after: avoid !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .sheet-bg-img {
                display: block !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            @page {
                size: A4 portrait;
                margin: 0mm;
            }
        }
    </style>
</head>
<body>

    <!-- TOP TOOLBAR -->
    <div class="toolbar no-print">
        <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <a href="javascript:window.close();" class="btn btn-outline-light btn-sm rounded-pill px-3">
                    <i class="fas fa-arrow-left me-1"></i> Close
                </a>
                <span class="vr bg-secondary"></span>
                <span class="fw-bold text-white fs-6">
                    <?= esc($letterpad['title']) ?>
                </span>
            </div>

            <div class="d-flex align-items-center gap-2">
                <!-- Download PDF Button -->
                <button type="button" class="btn btn-warning btn-sm fw-bold rounded-pill px-4 shadow-sm" id="btnDownloadPdf" onclick="downloadLetterPadPDF()">
                    <i class="fas fa-file-pdf me-1 text-danger"></i> Download PDF
                </button>

                <!-- Direct Print Button -->
                <button type="button" class="btn btn-primary btn-sm fw-bold rounded-pill px-4 shadow-sm" onclick="directPrint()">
                    <i class="fas fa-print me-1"></i> Direct Print
                </button>
            </div>
        </div>
    </div>

    <!-- DOCUMENT VIEWPORT -->
    <div class="sheet-viewport">
        <div id="printSheet" class="a4-portrait">
            <!-- Background Artwork Layer -->
            <img src="<?= base_url('assets/letterpad/letterpad.png') ?>" class="sheet-bg-img" alt="">
            <div class="document-inner">
                
                <!-- 1. TOP HEADER META ROW: TO (Left) & DATE (Right) -->
                <?php 
                    $hasTo = !empty(trim($letterpad['to_name'] ?? '')) || !empty(trim($letterpad['designation'] ?? '')) || !empty(trim($letterpad['location'] ?? ''));
                    $hasDate = !empty($letterpad['letter_date']) || !empty($letterpad['reference_no']);
                ?>
                <?php if ($hasTo || $hasDate): ?>
                <div class="top-meta-row">
                    <?php if ($hasTo): ?>
                    <div class="to-col">
                        <div class="meta-label">To :</div>
                        <div class="to-details">
                            <?php if (!empty(trim($letterpad['to_name'] ?? ''))): ?>
                                <div class="to-line"><?= esc(rtrim(trim($letterpad['to_name']), '.')) ?>.</div>
                            <?php endif; ?>
                            <?php if (!empty(trim($letterpad['designation'] ?? ''))): ?>
                                <div class="to-line"><?= esc(rtrim(trim($letterpad['designation']), '.')) ?>.</div>
                            <?php endif; ?>
                            <?php if (!empty(trim($letterpad['location'] ?? ''))): ?>
                                <div class="to-line"><?= esc(rtrim(trim($letterpad['location']), '.')) ?>.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($hasDate): ?>
                    <div class="date-col">
                        <?php if (!empty($letterpad['letter_date'])): ?>
                            <div class="meta-label">
                                Date : <?= date('d-m-Y', strtotime($letterpad['letter_date'])) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($letterpad['reference_no'])): ?>
                            <div class="ref-line">Ref : <?= esc($letterpad['reference_no']) ?></div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <!-- 2. MAIN DOCUMENT TITLE: Left Aligned, Bold Uppercase Sans-Serif -->
                <div class="doc-title-box">
                    <h1 class="doc-title"><?= esc($letterpad['title']) ?></h1>
                </div>

                <!-- 3. DOCUMENT BODY / DESCRIPTION -->
                <div class="doc-body">
                    <?= $letterpad['description'] ?>
                </div>

                <!-- 4. DOCUMENT SIGN-OFF (REGARDS / PROVIDER): Left Aligned at Bottom -->
                <?php 
                    $closing = !empty($letterpad['regards_closing']) ? trim($letterpad['regards_closing']) : '';
                    $closingDisplay = !empty($closing) ? rtrim($closing, ',: ') . ' :' : '';
                    $regardsName = !empty($letterpad['provider_name']) ? trim($letterpad['provider_name']) : (!empty($letterpad['regards_name']) ? trim($letterpad['regards_name']) : '');
                    $regardsRole = !empty($letterpad['provider_designation']) ? trim($letterpad['provider_designation']) : (!empty($letterpad['regards_role']) ? trim($letterpad['regards_role']) : '');
                    $regardsLocation = !empty($letterpad['location']) ? trim($letterpad['location']) : '';
                    $hasSignOff = !empty($closing) || !empty($regardsName) || !empty($regardsRole) || !empty($regardsLocation);
                ?>
                <?php if ($hasSignOff): ?>
                <div class="doc-sign-off">
                    <div class="sign-box">
                        <?php if (!empty($closingDisplay)): ?>
                            <div class="sign-closing"><?= esc($closingDisplay) ?></div>
                        <?php endif; ?>
                        <div class="sign-details">
                            <?php if (!empty($regardsName)): ?>
                                <div class="sign-line-text"><?= esc(rtrim($regardsName, '.')) ?>.</div>
                            <?php endif; ?>
                            <?php if (!empty($regardsRole)): ?>
                                <div class="sign-line-text"><?= esc(rtrim($regardsRole, '.')) ?>.</div>
                            <?php endif; ?>
                            <?php if (!empty($regardsLocation)): ?>
                                <div class="sign-line-text"><?= esc(rtrim($regardsLocation, '.')) ?>.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script>
    // Direct Print Function
    function directPrint() {
        window.print();
    }

    // Download PDF Function using html2pdf
    async function downloadLetterPadPDF() {
        const originalElement = document.getElementById('printSheet');
        const filename = '<?= preg_replace('/[^a-zA-Z0-9_-]/', '_', $letterpad['title']) ?>.pdf';
        
        const btn = document.getElementById('btnDownloadPdf');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Generating PDF...';
        btn.disabled = true;

        // Create an isolated container at top-left to avoid flex/scroll offset issues
        const container = document.createElement('div');
        container.style.position = 'fixed';
        container.style.left = '0';
        container.style.top = '0';
        container.style.width = '210mm';
        container.style.height = '297mm';
        container.style.overflow = 'hidden';
        container.style.zIndex = '999999';
        container.style.margin = '0';
        container.style.padding = '0';
        container.style.background = '#ffffff';

        const clone = originalElement.cloneNode(true);
        clone.style.margin = '0';
        clone.style.boxShadow = 'none';
        clone.style.width = '210mm';
        clone.style.height = '297mm';

        container.appendChild(clone);
        document.body.appendChild(container);

        // Allow layout and image decoding
        await new Promise(resolve => setTimeout(resolve, 100));

        const opt = {
            margin:       0,
            filename:     filename,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { 
                scale: 2, 
                useCORS: true, 
                logging: false,
                scrollX: 0,
                scrollY: 0
            },
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        try {
            await html2pdf()
                .set(opt)
                .from(clone)
                .toPdf()
                .get('pdf')
                .then((pdf) => {
                    const totalPages = pdf.internal.getNumberOfPages();
                    if (totalPages > 1) {
                        pdf.deletePage(totalPages);
                    }
                })
                .save();
        } catch (err) {
            console.error('PDF Generation Error:', err);
            alert('Failed to generate PDF. Please use Direct Print -> Save as PDF.');
        } finally {
            if (document.body.contains(container)) {
                document.body.removeChild(container);
            }
            btn.innerHTML = originalText;
            btn.disabled = false;
        }
    }

    // Auto print if requested via URL
    <?php if (!empty($autoprint)): ?>
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            window.print();
        }, 600);
    });
    <?php endif; ?>
    </script>
</body>
</html>
