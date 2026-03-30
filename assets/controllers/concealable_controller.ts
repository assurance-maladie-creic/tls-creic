import ...;

export default class extends Controller {
    static override values = {
        isConcealed: Boolean,
    };
    declare isConcealedValue: boolean;

    override connect(): void {
        if (this.isConcealedValue) {
            this.conceal();
        }
    }

    conceal(): void {
        this.element.classList.add('d-none');
    }

    reveal(): void {
        this.element.classList.remove('d-none');
    }
}
