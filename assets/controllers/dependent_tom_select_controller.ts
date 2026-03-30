import ...;

export default class DependentTomSelectController extends Controller<HTMLSelectElement> {
    static override outlets = ['primary-tom-select'];
    declare readonly primaryTomSelectOutlet: PrimaryTomSelectController;

    static override values = {
        loaderUrl: String,
    };
    declare loaderUrlValue: string;

    #eventsController = new AbortController();

    tomSelect: TomSelect;

    override connect(): void {
        // vient se greffer à un élément "autocomplete" existant
        this.element.addEventListener(
            'autocomplete:connect',
            this.#onConnect.bind(this),
            { signal: this.#eventsController.signal },
        );
    }

    override disconnect(): void {
        // détache les EventListeners lorsque le contrôleur se déconnecte pour
        // éviter les fuites de mémoire
        this.#eventsController.abort();
    }

    #onConnect(event: CustomEvent<AutocompleteConnectOptions>): void {
        this.tomSelect = event.detail.tomSelect;
    }

    /**
     * Supprime toutes les options
     */
    clearOptions(): void {
        const realSelect = this.element;

        while (realSelect.options.length > 0) {
            realSelect.options.remove(0);
        }
    }

    /**
     * Charge toutes les nouvelles options dans le composant TomSelect
     */
    loadNewOptions(options: TomOption[]): void {
        const realSelect = this.element;

        // Ajoute les nouvelles options dans l'élément <select> caché qui
        // fournit les données au composant TomSelect
        for (const newOption of options) {
            const optionElement = document.createElement('option');
            optionElement.textContent = newOption.text;
            optionElement.value = newOption.value;
            realSelect.options.add(optionElement);
        }

        // Re-synchronise le composant TomSelect avec l'élément <select>
        // sous-jacent
        this.tomSelect.sync();

        // TomSelect sélectionne automatiquement un élément dans la liste. S'il
        // y en a plusieurs, remettre le choix à zéro.
        if (options.length !== 1) {
            this.tomSelect.clear();
        }
    }

    disable(): void {
        this.tomSelect.setDisabled(true);
    }

    enable(): void {
        this.tomSelect.setDisabled(false);
    }
}
