import capitalize from "capitalize";
export default {
    filters: {
        createImagePath(path: string): string | undefined {
            return window.location.origin + "/spotevent/public/storage/" + path;
        },
        capitalize,
        truncate(value: string, length = 50): string {
            return (value.length > length) ? value.slice(0, length+1) + "..." : value
        }
    }
};
