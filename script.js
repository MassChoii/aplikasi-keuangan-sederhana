document.addEventListener("DOMContentLoaded", function () {
    fetch('saldo.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('saldo').innerText = 'Rp ' + data.totalSaldo.toLocaleString();
            document.getElementById('pemasukan').innerText = 'Rp ' + data.totalPemasukan.toLocaleString();
            document.getElementById('pengeluaran').innerText = 'Rp ' + data.totalPengeluaran.toLocaleString();
        })
        .catch(error => console.error('Error fetching saldo data:', error));
});
