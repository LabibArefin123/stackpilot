const TerminalHelper = {
    escape(text) {
        return $("<div>").text(text).html();
    },

    timestamp() {
        return new Date().toLocaleTimeString();
    },

    separator() {
        return "----------------------------------------";
    },
};
