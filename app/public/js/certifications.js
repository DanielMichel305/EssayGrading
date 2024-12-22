// Function to simulate course completion
document.getElementById('completeButton').onclick = function() {
    document.getElementById('progressFill').style.width = '100%';
    document.getElementById('progressText').innerText = '100% Completed';
    document.getElementById('completeButton').style.display = 'none';
    document.getElementById('certificateSection').style.display = 'block';
};

// Function to receive the certificate
document.getElementById('receiveCertificateButton').onclick = function() {
    const date = new Date().toLocaleDateString();
    document.getElementById('certificateDate').innerText = date;
    document.getElementById('certificate').style.display = 'block';
};

// Function to download the certificate
document.getElementById('downloadButton').onclick = function() {
    html2canvas(document.getElementById('certificateTemplate')).then(function(canvas) {
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = 'certificate.png';
        link.click();
    });
};
