jQuery( window ).on('elementor/frontend/init', () => {
    if (elementorFrontend.isEditMode()) {
        elementorFrontend.hooks.addAction('frontend/element_ready/ohio_heading.default', ( $element ) => {
            if (AOS) {
                AOS.init();
            }
        });
    }
});