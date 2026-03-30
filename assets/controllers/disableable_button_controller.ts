import ...;

export default class extends Controller<HTMLButtonElement> {
    enable(): void {
        this.element.disabled = false;
    }

    disable(): void {
        this.element.disabled = true;
    }
}
