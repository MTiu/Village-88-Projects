module.exports = 
    class StringLib {
        concat(word1, word2) {
            return "" + word1 + word2;
        }
        repeat(word, times) {
            let string = "";
            for (let i = 0; i < times; i++) {
                string += word + "";
            }
            return string;
        }
        toString(input) {
            return input + "";
        }
        charAt(word, index) {
            return word[index];
        }
    };
