import { IRootState } from "./interfaces";
import {AppService} from '@/services/app.service'
export default {
    async fetchContentTexts(state: IRootState): Promise<void> {
        const service = new AppService();

            const result = await service.contents();
            
            console.log(result);
            
            if (result.statu == 1) {
                state.contents = result.listCommune;
                return;
            }

            console.log("boom");
            
            throw new Error("an error")
    }
};
