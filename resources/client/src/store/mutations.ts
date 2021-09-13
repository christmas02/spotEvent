export default {
    contactModal(state: any, status: boolean) {
        state.contactModal = status;
    },
    startLoading(state: any) {
        state.loading = true;
    },
    stopLoading(state: any) {
        state.loading = false;
    },
    authFavoritesModalStatus(state: any, val: boolean) {
        state.favoritesModal = val;
    }
};
