
    const opiniList = document.querySelectorAll('.opini');
    const nextBtn = document.getElementById('next');
    const prevBtn = document.getElementById('prev');

    let currentIndex = 0;

    function showOpini(index) {
        opiniList.forEach((opini, i) => {
            opini.classList.remove('active');
            if (i === index) {
                opini.classList.add('active');
            }
        });
    }

    nextBtn.addEventListener('click', () => {
        if (currentIndex < opiniList.length - 1) {
            currentIndex++;
            showOpini(currentIndex);
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            showOpini(currentIndex);
        }
    });

    // Tampilkan opini pertama saat halaman dimuat
    showOpini(currentIndex);
