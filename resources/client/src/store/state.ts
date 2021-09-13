import { IRootState } from "./interfaces";


const state = (): IRootState => ({
    contactModal: false,
        loading: false,
        favoritesModal: false,
        contents: []
});

export default state;
