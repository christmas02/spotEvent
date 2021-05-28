import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";

export interface IBenefitState {
    benefits: Benefit[];
    categories: ICategory[];
    estimates: IEstimate[];
    providers: IProvider[];
}
