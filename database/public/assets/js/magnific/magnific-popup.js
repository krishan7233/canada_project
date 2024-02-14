 $('.moto').magnificPopup({
                type: 'image',
                mainClass: 'mfp-with-zoom', // this class is for CSS animation below
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it
                    duration: 500, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
            }

        );

        $('.moto').magnificPopup({
                type: 'image',
                mainClass: 'mfp-with-zoom', // this class is for CSS animation below
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it
                    duration: 500, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
            }

        );

        $('.tute-video').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-with-zoom', // this class is for CSS animation below
                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it
                    duration: 500, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function
                    opener: function(openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
            }

        );