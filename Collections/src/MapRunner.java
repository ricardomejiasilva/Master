import java.util.HashMap;
import java.util.Map;

public class MapRunner {

	public static void main(String[] args) {
		String str = "This is an awesome occasion " + "This has never happened before";

		Map<Character, Integer> occurances = new HashMap<>();

		char[] characters = str.toCharArray();

		for (char character : characters) {
			// Get Char
			Integer interger = occurances.get(character);
			if (interger == null) {
				occurances.put(character, 1);
			} else {
				occurances.put(character, interger + 1);
			}
		}

		System.out.println(occurances);


		Map<String, Integer> StringOccurances = new HashMap<>();

		String[] words = str.split(" ");

		for (String word : words) {
			// Get Char
			Integer interger = StringOccurances.get(word);
			if (interger == null) {
				StringOccurances.put(word, 1);
			} else {
				StringOccurances.put(word, interger + 1);
			}
		}

		System.out.println(StringOccurances);
	}

}
