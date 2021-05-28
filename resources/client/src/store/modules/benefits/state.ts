import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";

const state: () => IBenefitState = () => ({
    benefits: [],
    categories: [],
    estimates: [],
    providers: []
});

export default state;
