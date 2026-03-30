import ...;

/**
 * Pour une raison étrange, les champs d'autocomplétion d'entités ont toujours
 * la valeur de la dernière option du select à chaque fois que l'utilisateur en
 * choisit une. Ce contrôleur corrige ce comportement.
 */
export default class FixTomSelectController extends Controller {
    #eventsController = new AbortController();

    override connect(): void {
        this.element.addEventListener(
            'autocomplete:connect',
            this.#onConnect.bind(this),
            { signal: this.#eventsController.signal },
        );
    }

    override disconnect(): void {
        this.#eventsController.abort();
    }

    #onConnect(event: CustomEvent<AutocompleteConnectOptions>): void {
        const tomSelect = event.detail.tomSelect;
        const tomInput = tomSelect.input;
        tomSelect.on('item_add', (value: string) => {
            setTimeout(() => (tomInput.value = value), 0);
        });
    }
}
