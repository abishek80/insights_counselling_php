<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($certificate['title']) ?> - <?= esc($certificate['recipient_name']) ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('favicon.ico?v=2') ?>" sizes="any">
    <!-- Google Fonts -->
    <!-- DejaVu Sans Font -->
    <link href="https://fonts.cdnfonts.com/css/dejavu-sans" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Great+Vibes&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --primary-navy: #2e2a70;
            --gold-accent: #e59a18;
            --gold-dark: #b87b14;
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

        /* A4 Landscape Certificate (297mm x 210mm) */
        .certificate-sheet {
            width: 297mm;
            min-height: 210mm;
            height: 210mm;
            background-color: #ffffff;
            position: relative;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.35);
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

        .cert-title,
        .cert-recipient-name,
        .cert-description,
        .cert-summary-note,
        .cert-val-duration,
        .cert-val-certno,
        .cert-val-date,
        .cert-signatory {
            z-index: 5;
        }

        /* 1. Certificate Title (e.g. Completion of Internship) placed between 'A Safe Space for Healing' and the gold leaf divider */
        .cert-title {
            position: absolute;
            top: 23.5%;
            left: 5%;
            right: 5%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: 'Cinzel', serif;
            font-size: 26pt;
            font-weight: 700;
            color: #2e2a70;
            letter-spacing: 1px;
        }

        /* 2. Recipient Name: placed in the blank gap between 'THIS IS TO CERTIFY THAT' (Y=38.7%) and 'has successfully completed...' (Y=56.3%) */
        .cert-recipient-name {
            position: absolute;
            top: 42%;
            left: 5%;
            right: 5%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: 'Cinzel', serif;
            font-size: 35pt;
            font-weight: 700;
            color: #2e2a70;
            text-shadow: 0 1px 2px rgba(24, 35, 82, 0.05);
            word-break: break-word;
        }

        /* 2.5 Description (Completion statement) */
        .cert-description {
            position: absolute;
            top: 54%;
            left: 5%;
            right: 5%;
            text-align: center;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12pt;
            font-weight: 600;
            color: #1c1e8c;
            line-height: 1.45;
            letter-spacing: 0.1px;
        }

        /* 2.6 Summary Note (Exposure / training details) */
        .cert-summary-note {
            position: absolute;
            top: 61.5%;
            left: 8%;
            right: 12%;
            text-align: center;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12pt;
            font-weight: 600;
            color: #1c1e8c;
            line-height: 1.45;
            letter-spacing: 0.1px;
        }

        /* 3. Duration value: aligned right after 'Internship Duration :' (colon at 22.95%) */
        .cert-val-duration {
            position: absolute;
            top: 77.5%;
            left: 24.2%;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10.5pt;
            font-weight: 700;
            color: #2e2a70;
            letter-spacing: 0.2px;
            line-height: 1;
        }

        /* 4. Certificate Number value: aligned right after 'Certificate Number :' (colon at 22.46%) */
        .cert-val-certno {
            position: absolute;
            top: 81.2%;
            left: 24.2%;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10.5pt;
            font-weight: 700;
            color: #2e2a70;
            letter-spacing: 0.2px;
            line-height: 1;
        }

        /* 5. Issue Date value: aligned right after 'Issue Date :' (aligned with Duration and Cert No column) */
        .cert-val-date {
            position: absolute;
            top: 85.1%;
            left: 24.2%;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10.5pt;
            font-weight: 700;
            color: #2e2a70;
            letter-spacing: 0.2px;
            line-height: 1;
        }

        /* 6. Signatory / Provider Name (Bottom Right) */
        .cert-signatory {
            position: absolute;
            top: 81.5%;
            left: 67.2%;
            text-align: left;
            background-color: #ffffff;
            padding: 0 8px 0 0;
            line-height: 1.3;
            min-width: 220px;
        }

        .cert-provider-name {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11pt;
            font-weight: 700;
            color: #2e2a70;
            margin-bottom: 6px;
            letter-spacing: 1px;
        }

        .cert-provider-role {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 9.5pt;
            font-weight: 700;
            color: #2e2a70;
            letter-spacing: 1px;
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

            .certificate-sheet {
                width: 297mm !important;
                height: 210mm !important;
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
                size: A4 landscape;
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
                    <?= esc($certificate['title']) ?>: <strong><?= esc($certificate['recipient_name']) ?></strong>
                </span>
                <span class="badge bg-warning text-dark rounded-pill font-monospace">
                    <?= esc($certificate['certificate_number']) ?>
                </span>
            </div>

            <div class="d-flex align-items-center gap-2">
                <!-- Download PDF Button -->
                <button type="button" class="btn btn-warning btn-sm fw-bold rounded-pill px-4 shadow-sm" id="btnDownloadPdf" onclick="downloadCertificatePDF()">
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
        <div id="certSheet" class="certificate-sheet">
            <!-- Background Artwork Layer -->
            <img src="<?= base_url('assets/letterpad/certificate.png') ?>" class="sheet-bg-img" alt="">
            <!-- 1. Certificate Title (e.g. Completion of Internship) -->
            <?php if (!empty($certificate['title'])): ?>
                <div class="cert-title">
                    <?= esc($certificate['title']) ?>
                </div>
            <?php endif; ?>

            <!-- 2. Recipient Name: placed in the blank space between 'THIS IS TO CERTIFY THAT' and 'has successfully completed...' -->
            <div class="cert-recipient-name">
                <?= esc($certificate['recipient_name']) ?>
            </div>

            <!-- Description (Completion Statement) -->
            <?php 
                $defaultDesc = "has successfully completed an Internship in\nCounseling Psychology at Insight Counseling Services.";
                $certDesc = !empty($certificate['description']) ? $certificate['description'] : $defaultDesc;
            ?>
            <div class="cert-description">
                <?= nl2br(esc($certDesc)) ?>
            </div>

            <!-- Summary Note (Detailed Exposure / Learning Statement) -->
            <?php if (!empty($certificate['summary_note'])): ?>
                <div class="cert-summary-note">
                    <?= nl2br(esc($certificate['summary_note'])) ?>
                </div>
            <?php endif; ?>

            <!-- 3. Internship Duration: aligned after 'Internship Duration :' on bottom-left -->
            <div class="cert-val-duration">
                <?= esc($certificate['duration'] ?: '4 Weeks') ?>
            </div>

            <!-- 4. Certificate Number: aligned after 'Certificate Number :' on bottom-left -->
            <div class="cert-val-certno">
                <?= esc($certificate['certificate_number']) ?>
            </div>

            <!-- 5. Issue Date: aligned after 'Issue Date :' on bottom-left -->
            <div class="cert-val-date">
                <?= !empty($certificate['issue_date']) ? date('d-m-Y', strtotime($certificate['issue_date'])) : date('d-m-Y') ?>
            </div>

            <!-- 6. Provider Name & Role (Bottom Right Signatory) -->
            <?php 
                $providerName = !empty($certificate['provider_name']) ? $certificate['provider_name'] : 'MRS. LEKHA EDWIN';
                $providerRole = !empty($certificate['provider_designation']) ? $certificate['provider_designation'] : 'Counseling Psychologist';
            ?>
            <div class="cert-signatory">
                <div class="cert-provider-name"><?= esc($providerName) ?></div>
                <div class="cert-provider-role"><?= esc($providerRole) ?></div>
            </div>
        </div>
    </div>

    <script>
    // Direct Print Function
    function directPrint() {
        window.print();
    }

    // Download PDF Function using html2pdf
    async function downloadCertificatePDF() {
        const originalElement = document.getElementById('certSheet');
        const filename = 'Certificate_<?= preg_replace('/[^a-zA-Z0-9_-]/', '_', $certificate['recipient_name']) ?>.pdf';
        
        const btn = document.getElementById('btnDownloadPdf');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Generating PDF...';
        btn.disabled = true;

        // Create an isolated container at top-left to avoid flex/scroll offset issues
        const container = document.createElement('div');
        container.style.position = 'fixed';
        container.style.left = '0';
        container.style.top = '0';
        container.style.width = '297mm';
        container.style.height = '210mm';
        container.style.overflow = 'hidden';
        container.style.zIndex = '999999';
        container.style.margin = '0';
        container.style.padding = '0';
        container.style.background = '#ffffff';

        const clone = originalElement.cloneNode(true);
        clone.style.margin = '0';
        clone.style.boxShadow = 'none';
        clone.style.width = '297mm';
        clone.style.height = '210mm';

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
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' }
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
    <?php if ($autoprint): ?>
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            window.print();
        }, 600);
    });
    <?php endif; ?>
    </script>
</body>
</html>
