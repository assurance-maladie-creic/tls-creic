import ...;


/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static override targets = [
        'inputTroisMois',
        'partieDouzeMois',
        'inputDouzeMois',
        'partieCreationEspace',
        'partieRessourcesInsuffisantes',
        'boutonValider',
    ];
    declare readonly inputTroisMoisTargets: HTMLInputElement[];
    declare readonly partieDouzeMoisTarget: HTMLElement;
    declare readonly inputDouzeMoisTargets: HTMLInputElement[];
    declare readonly partieCreationEspaceTarget: HTMLElement;
    declare readonly partieRessourcesInsuffisantesTarget: HTMLElement;
    declare readonly boutonValiderTarget: HTMLElement;

    static override values = {
        minimaSociauxTroisMois: Number,
        minimaSociauxDouzeMois: Number,
    };
    declare minimaSociauxTroisMoisValue: number;
    declare minimaSociauxDouzeMoisValue: number;

    override connect(): void {
        this.rafraichirEtat();
    }

    #totalEnCentimes(inputs: HTMLInputElement[]): number {
        let total = 0;

        for (const input of inputs) {
            total += Number(input.value.replace(',', '.'));
        }

        return total * 100;
    }

    #tousVides(inputs: HTMLInputElement[]): boolean {
        for (const input of inputs) {
            if (input.value !== '') {
                return false;
            }
        }

        return true;
    }

    get #troisMoisEstSuffisant(): boolean {
        return (
            this.#totalEnCentimes(this.inputTroisMoisTargets) >=
            this.minimaSociauxTroisMoisValue
        );
    }

    get #douzeMoisEstSuffisant(): boolean {
        return (
            this.#totalEnCentimes(this.inputDouzeMoisTargets) >=
            this.minimaSociauxDouzeMoisValue
        );
    }

    rafraichirEtat(): void {
        this.#rafraichirEtatDouzeMois();
        this.#rafraichirEtatEspaceCreation();
        this.#rafraichirEtatInsuffisant();
    }

    #rafraichirEtatDouzeMois(): void {
        if (
            this.#tousVides(this.inputTroisMoisTargets) ||
            this.#troisMoisEstSuffisant
        ) {
            this.partieDouzeMoisTarget.classList.add('d-none');
        } else {
            this.partieDouzeMoisTarget.classList.remove('d-none');
        }
    }

    #rafraichirEtatEspaceCreation(): void {
        if (this.#troisMoisEstSuffisant || this.#douzeMoisEstSuffisant) {
            this.partieCreationEspaceTarget.classList.remove('d-none');
            this.boutonValiderTarget.classList.remove('btn--primary-light');
            this.boutonValiderTarget.classList.add('btn-outline--primary');
        } else {
            this.partieCreationEspaceTarget.classList.add('d-none');
            this.boutonValiderTarget.classList.remove('btn-outline--primary');
            this.boutonValiderTarget.classList.add('btn--primary-light');
        }
    }

    #rafraichirEtatInsuffisant(): void {
        if (
            this.#tousVides(this.inputDouzeMoisTargets) ||
            this.#troisMoisEstSuffisant ||
            this.#douzeMoisEstSuffisant
        ) {
            this.partieRessourcesInsuffisantesTarget.classList.add('d-none');
        } else {
            this.partieRessourcesInsuffisantesTarget.classList.remove('d-none');
        }
    }
}
