import ...;


/* stimulusFetch: 'lazy' */
export default class extends Controller<HTMLInputElement> {
    static override outlets = ['concealable'];
    declare readonly concealableOutlets: ConcealableController[];

    override connect(): void {
        this.triggerConceal();
    }

    triggerConceal(): void {
        if (this.element.value !== '1') {
            for (const concealable of this.concealableOutlets) {
                concealable.conceal();
            }
        } else {
            for (const concealable of this.concealableOutlets) {
                concealable.reveal();
            }
        }
    }
}
