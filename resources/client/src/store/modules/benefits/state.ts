import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";
import { ISearchForm } from "@/interfaces/app-services.interfaces";

const state: () => IBenefitState = () => ({
    benefits: [],
    prestations: (null as unknown) as ISearchForm,
    categories: [],
    estimates: [],
    providers: [],
    choiceCategorie: (null as unknown) as string,
    choiceEstimateMin: (null as unknown) as string,
    choiceEstimateMax: (null as unknown) as string,
    choiceLocalisation: (null as unknown) as string
});

export default state;
