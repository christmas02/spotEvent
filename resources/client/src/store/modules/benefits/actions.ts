import { ISearchForm } from "@/interfaces/app-services.interfaces";
import { AppService } from "@/services/app.service";
import { BenefitService } from "@/services/benefit.service";
import store from "@/store";
import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";

export default {
    // async prestationsSearchForm({
    //     commit,
    //     state
    // }: {
    //     commit: any;
    //     state: IBenefitState;
    // }): Promise<void> {
    //     //  state.prestations.length === 0
    //     console.log("ici");

    //     const prestationsSearch = new AppService();
    //     // await commit("updatePrestationSearch");

    //     const data = new Object() as ISearchForm;

    //     data.localisation = state.choiceLocalisation;
    //     data.estmation_max = state.choiceEstimateMax;
    //     data.estmation_min = state.choiceEstimateMin;
    //     data.id_prestation = state.choiceCategorie.toString();

    //     const result = await prestationsSearch.getPrestationsSearchForm(data);
    //     console.log(result);

    //     if (result.statu == 0) {
    //         console.log("resultat");

    //         console.log(result.resultat);

    //         commit("storeSearchResult", result.resultat);
    //     } else if (result.statu == 1) {
    //         alert("Aucun resultat trouvé");
    //     } else {
    //         alert("erreur lors de la recherche  des prestations");
    //     }
    // },
    async fetchAll(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.benefits.length === 0) {
            const benefitService = new BenefitService();

            const result = await benefitService.getAll();

            if (result.statu == 1) {
                commit("store", result.listPrestation);
                // console.log("fit fit");
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
