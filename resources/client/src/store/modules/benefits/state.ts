import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";
import { ISearchForm } from "@/interfaces/app-services.interfaces";
import { Benefit } from "@/interfaces/benefit.interface";

const state: () => IBenefitState = () => ({
    benefits: [] as Benefit[],
    prestations: (null as unknown) as ISearchForm,
    categories: [],
    communes: [],
    estimates: [],
    providers: [],
    choiceCategorie: (null as unknown) as string,
    choiceEstimateMin: (null as unknown) as string,
    choiceEstimateMax: (null as unknown) as string,
    choiceLocalisation: (null as unknown) as string,
    statusFormUpdateProfil: false,
    statusFormUpdatePhoto: false,
    statusFormUpdatePassword: false,
    loading: false,
    isFilter: false
});

export default state;
