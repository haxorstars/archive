var expectedKeySequence = ['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown'];
    var currentStep = 0;
    var mobileTapCount = 0;
    var lastTapTime = 0;
    var tapDelay = 300;

    function toggleShow() {
        var notFound = document.getElementById('notfound');
        notFound.style.display = 'block';
    }

    function isMobileDevice() {
        return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
    }

    function handleMobileTap() {
        var currentTime = new Date().getTime();
        if (currentTime - lastTapTime < tapDelay) {
            mobileTapCount++;
            if (mobileTapCount === 2) {
                toggleShow();
            }
        } else {
            mobileTapCount = 1;
        }
        lastTapTime = currentTime;
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (!isMobileDevice()) {
            document.addEventListener('keydown', function(event) {
                if (event.key === expectedKeySequence[currentStep]) {
                    currentStep++;
                    if (currentStep === expectedKeySequence.length) {
                        toggleShow();
                        alert("Code Is Successful, Now Press TAB, Then Enter The Password");
                        currentStep = 0;
                    }
                } else {
                    currentStep = 0;
                }
            });
        } else {
            document.addEventListener('touchstart', function() {
                handleMobileTap();
            });
        }
    });
