<?php

require_once(APPPATH . 'third_party/tcpdf/tcpdf.php');
class CustomTCPDF extends TCPDF {
    private $headerTitle = '';
    private $logoPath = ''; 

    public function __construct($title = '') {
        parent::__construct();
        $this->headerTitle = $title; 
        $this->logoPath = base_url() . 'hr-management/dist/img/logo.png'; 
        
    }
    


    // Page footer
    public function Footer() {
        $this->SetY(-15);
        $this->SetLineWidth(0.5); // Set line width as needed
        $this->SetDrawColor(0, 0, 0); // Color (black)
        $this->Line(15, $this->getPageHeight() - 20, 195, $this->getPageHeight() - 20); // Draw a line in the footer
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
  


    public function Header() {
        if ($this->getPage() == 1) {

             // Add logo to the left side of the header
             $this->Image($this->logoPath, 10, 1, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false);
            //  $this->Image($this->logoPath, 10, 5, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false);


            $this->SetFont('helvetica', 'B', 14);
            $this->SetXY(10, 10); 
            $this->writeHTMLCell(
                180, // Width
                0, // Height (auto)
                10, // X position
                10, // Y position
                $this->headerTitle, // Content
                0, // Border
                1, // Line break (1: auto, 0: no)
                false, // Fill
                true, // Resizable
                'C', // Align
                true // Auto page break
            );
            // $this->Cell(180, 10, $this->headerTitle, 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(15);
        }

        // Draw an underline after the header content
        $this->SetLineWidth(0.5); // Set line width as needed
         $this->SetDrawColor(0, 0, 0); // color (black)
        
        $this->Line(15, 30, 195, 30); // Draw a line after the header
    }
    


    
}

// Note
//     Line($x1, $y1, $x2, $y2)
// $x1: The X-coordinate of the starting point of the line (10 in this case).
// $y1: The Y-coordinate of the starting point of the line (30 in this case).
// $x2: The X-coordinate of the ending point of the line (190 in this case).
// $y2: The Y-coordinate of the ending point of the line (30 in this case).

// $this->Image(
//     $file,        // Path to the image file or URL
//     $x,           // X-coordinate for the top-left corner of the image
//     $y,           // Y-coordinate for the top-left corner of the image
//     $w,           // Width of the image (optional)
//     $h,           // Height of the image (optional)
//     $type,        // Image format (optional, default is '')
//     $link,        // URL or identifier to link the image (optional)
//     $align,       // Image alignment (optional, default is 'C')
//     $resize,      // Image resizing (optional, default is false)
//     $dpi,         // Image DPI (optional, default is 300)
//     $palign,      // Alignment of the reference point (optional, default is '')
//     $ismask,      // Is image a mask (optional, default is false)
//     $imgmask,     // Mask identifier (optional, default is false)
//     $border,      // Image border size (optional, default is 0)
//     $fitbox,      // Fit the image into a box (optional, default is false)
//     $hidden,      // Make the image invisible (optional, default is false)
//     $fitonpage    // Fit the image on the page (optional, default is false)
// );

// $this->Line(15, $this->getPageHeight() - 20, 195, $this->getPageHeight() - 20); // Draw a line in the footer
// $x1: This parameter represents the X-coordinate of the starting point of the line.

// $y1: This parameter represents the Y-coordinate of the starting point of the line.

// $x2: This parameter represents the X-coordinate of the ending point of the line.

// $y2: This parameter represents the Y-coordinate of the ending point of the line.

// In the context of the code snippet provided earlier:

// $this->getPageHeight() returns the height of the current page in the PDF document.
// $this->getPageHeight() - 20 adjusts the Y-coordinate to leave a margin from the bottom of the page. It subtracts 20 units (in points, as specified by TCPDF) from the height of the page. This provides a margin above the bottom edge where the line will be drawn in the footer.
