export function custumScripts() {
    console.log('custom-v3');
    $(document).ready(function () {
        // Получаем все элементы с классом form-wrapper
        const formWrappers = $(".form-wrapper");

        // Для каждого form-wrapper копируем текст из policy-text в form-policy
        formWrappers.each(function () {
            $(this).find(".form-policy").html($(this).find(".policy-text"));
        });

        // Добавляем маску ввода для всех полей типа "tel"
        var phoneInputs = document.querySelectorAll('input[type="tel"]');
        var maskOptions = { mask: "+{7} (000) 000-00-00" };

        for (let i = 0; i < phoneInputs.length; i++) {
            IMask(phoneInputs[i], maskOptions);
        }

        // policy checkbox checked by default; form-policy нужен плагину для текста ошибки
        $('.form-sec__privacy').addClass('form-policy');
        $('.form-sec__privacy input[type="checkbox"], .form-sec input[type="checkbox"]').prop('checked', true);

        // Определяем поддержку формата WEBP
        function checkWebPSupport(status) {
            status = status === true ? "webp" : "no-webp";
            document.documentElement.classList.add(status);
        }

        var img = new Image();
        img.onload = img.onerror = function () {
            checkWebPSupport(img.height === 2);
        };
        img.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";

        // Обрабатываем клики по элементам списка .format-items__list
        const formatItems = $(".format-items__list li");

        formatItems.on("click", function () {
            formatItems.removeClass("_active");
            $(this).addClass("_active");
        });

        // Работа с чекбоксом политики
        const policyInput = $('.form__policy input[name="policy"]');
        if (policyInput.length) {

            for (let i = 0; i < policyInput.length; i++) {                   
                $($(policyInput[i]).closest('label')[0]).on('click', function (e) {
                    if (e.target.tagName === 'LABEL') {
                        $(e.target).toggleClass('_active')
                    } else if (e.target.tagName === 'INPUT' || e.target.name === 'policy') {
                        if ($(e.target).attr('checked')) {
                            $(e.target).attr('checked', false);
                        } else {
                            $(e.target).attr('checked', 'checked');
                        }
                    };
                })
            }
        }

        // Заполняем скрытое поле значением текущего URL
        var currentUrl = window.location.href;
        $('input[name="text-page"]').each(function () {
            $(this).val(currentUrl);
        });
    });

    // аниманиця
    document.addEventListener("DOMContentLoaded", function () {
    function isElementInViewport(element) {
        var elementTop = $(element).offset().top;
        var elementHeight = $(element).outerHeight();
        var viewportHeight = $(window).height();
        var scrollTop = $(window).scrollTop();
        return ((elementTop - scrollTop) <= (viewportHeight * 5 / 6) && (elementTop + elementHeight) > scrollTop);
    }

    function checkAnimateElements() {
        $('._fadein').each(function () {
            var $element = $(this);
            var delay = (parseInt($element.attr('data-delay')) * 100) || 0;

            if (isElementInViewport(this)) {
                setTimeout(function () {
                    $element.removeClass('_fadein');
                }, delay);
            }
        });
    }

    $(window).on('scroll resize', checkAnimateElements);
    checkAnimateElements();
    });

    // ленивая загрузка
    document.addEventListener("DOMContentLoaded", function () {
    console.log('lazy-images loaded');

    const lazyImages = document.querySelectorAll("img.lazy");
    const lazySources = document.querySelectorAll("picture source[data-srcset]");

    if ("IntersectionObserver" in window) {
        const lazyObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                    }
                    if (img.dataset.srcset) {
                        img.srcset = img.dataset.srcset;
                    }
                    img.classList.remove('lazy');
                    lazyObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => lazyObserver.observe(img));
        lazySources.forEach(source => lazyObserver.observe(source));

    } else {
        let lazyLoadThrottleTimeout;

        function lazyLoad() {
            if (lazyLoadThrottleTimeout) {
                clearTimeout(lazyLoadThrottleTimeout);
            }

            lazyLoadThrottleTimeout = setTimeout(function () {
                const scrollTop = window.pageYOffset;

                lazyImages.forEach(function (img) {
                    if (img.offsetTop < (window.innerHeight + scrollTop)) {
                        img.src = img.dataset.src;
                        if (img.dataset.srcset) {
                            img.srcset = img.dataset.srcset;
                        }
                        img.classList.remove('lazy');
                    }
                });

                lazySources.forEach(function (source) {
                    if (source.parentElement.offsetTop < (window.innerHeight + scrollTop)) {
                        source.srcset = source.dataset.srcset;
                    }
                });

                if (lazyImages.length === 0 && lazySources.length === 0) {
                    document.removeEventListener("scroll", lazyLoad);
                    window.removeEventListener("resize", lazyLoad);
                    window.removeEventListener("orientationChange", lazyLoad);
                }
            }, 20);
        }

        window.addEventListener("load", lazyLoad);
        document.addEventListener("scroll", lazyLoad);
        window.addEventListener("resize", lazyLoad);
        window.addEventListener("orientationChange", lazyLoad);
    }
    });
}