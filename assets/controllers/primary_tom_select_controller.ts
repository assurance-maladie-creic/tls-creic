import ...;

export default class extends Controller {
    static override outlets = ['dependent-tom-select'];
    declare readonly dependentTomSelectOutlet: DependentTomSelectController;

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
        this.tomSelect.on('change', this.#onChange.bind(this));
    }

    async #onChange(value: string): Promise<void> {
        this.dependentTomSelectOutlet.clearOptions();
        this.dependentTomSelectOutlet.disable();

        if (value === '') {
            return;
        }

        // Appelle l'api côté serveur pour charger les options en JSON
        const url = new URL(
            this.dependentTomSelectOutlet.loaderUrlValue,
            globalThis.location.origin,
        );
        url.searchParams.append('query', value);
        const response = await fetch(url);
        const json = await response.json();

        if (json.length === 0) {
            return;
        }

        this.dependentTomSelectOutlet.loadNewOptions(json);
        this.dependentTomSelectOutlet.enable();
    }
}
