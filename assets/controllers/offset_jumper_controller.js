import ...;

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['navbar'];

    /**
     * @param {MouseEvent} event
     */
    jump(event) {
        event.preventDefault();
        const target = /** @type {HTMLAnchorElement|null} */ (
            event.currentTarget
        );

        const navbarElement = /** @type {HTMLElement} */ (this.navbarTarget);
        const headerOffset = navbarElement.offsetHeight;
        const jumpTarget = document.querySelector(target.getAttribute('href'));

        if (jumpTarget == null || !jumpTarget.checkVisibility()) {
            return;
        }

        const titlePosition = jumpTarget.getBoundingClientRect().top;
        scrollTo({
            top: titlePosition + window.scrollY - headerOffset,
        });
    }
}
