import capitalize from "capitalize";
export default {
    filters: {
        createImagePath(path: string): string | undefined {
            return window.location.origin + "/storage/" + path;
        },
        capitalize,
        truncate(value: string, length = 50) {
            return (value.length > length) ? value.slice(0, length) + "..." : value
        }
    }
};
