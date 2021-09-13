import { Content, Page } from "@/interfaces/app-services.interfaces";
import { IRootState } from "./interfaces";

export default {
    contactModal(state: IRootState): boolean {
        return state.contactModal;
    },
    favoritesModal(state: IRootState): boolean {
        return state.favoritesModal;
    },
    contents(state: IRootState): any {
        return (page: Page) => {            
            const contents: any = {};
            state.contents
            .filter(content => content.page == page)
            .forEach(content => {
                contents[content.titre_contenus] =  content.contenus
                
            })            
            return contents;
        }
    },
    homeContents(_: IRootState, getters: any): Content[] {        
        return getters.contents("accueil");
    },
    aboutContents(_: IRootState, getters: any): Content[] {
        return getters.contents("apropos");
    },
    contactContents(_: IRootState, getters: any): Content[] {
        return getters.contents("contact");
    }
};
