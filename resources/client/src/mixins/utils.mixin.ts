export default {
    methods: {
        createImagePath(path: string): string | undefined {
            return window.location.origin + "/storage/" + path;
        }
    }
};
