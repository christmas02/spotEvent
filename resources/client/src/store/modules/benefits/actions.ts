import { AppService } from "@/services/app.service";
import { BenefitService } from "@/services/benefit.service";
import store from "@/store";
import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";

export default {
    async prestationsSearchForm({
        commit,
        state
    }: {
        commit: any;
        state: IBenefitState;
    }): // force = false
    Promise<void> {
        //  state.prestations.length === 0
        console.log("ici");

        const prestationsSearch = new AppService();
        store.commit("benefits/updatePrestationSearch");

        const result = await prestationsSearch.getPrestationsSearchForm(
            store.getters["benefits/prestationsSearch"]
            // state.prestations
        );

        if (result.statu == 1) {
            console.log("resultat");

            console.log(result.resultat);

            // commit("store", result.resultat);
        } else {
            alert("erreur lors de la recherche  des prestations");
        }
    },
    async fetchAll(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.benefits.length === 0) {
            const benefitService = new BenefitService();

            const result = await benefitService.getAll();

            if (result.statu == 1) {
                commit("prestations", result.listPrestation);
            } else {
                alert("erreur lors de la recuperation des prestations");
            }
        }
    },
    async fetchProviders(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.providers.length === 0) {
            const benefitService = new BenefitService();
            const result = await benefitService.getProviders();

            if (result.statu == 1) {
                commit("storeProviders", result.listPrestataire);
            } else {
                alert("erreur lors de la recuperation des prestataires");
            }
        }
    },
    async fetchCategories(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.categories.length === 0) {
            const benefitService = new BenefitService();

            const result = await benefitService.getCategories();

            if (result.statu == 1) {
                commit("storeCategories", result.listCategorie);
            } else {
                alert("erreur lors de la recuperation des categories");
            }
        }
    },
    async fetchEstimates(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.categories.length === 0) {
            const benefitService = new BenefitService();

            const result = await benefitService.getEstimates();

            if (result.statu == 1) {
                commit("storeEstimates", result.listCategorie);
            } else {
                alert("erreur lors de la recuperation des estimations");
            }
        }
    }
};
