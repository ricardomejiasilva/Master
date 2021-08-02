import java.util.HashSet;
import java.util.LinkedHashSet;
import java.util.List;
import java.util.Set;
import java.util.TreeSet;

public class SetRuuner {

	public static void main(String[] args) {
		List<Character> characters = List.of('a', 'z', 'a', 'b', 'z', 'f');
		// Unique = set

		Set<Character> treeSet = new TreeSet(characters);
		System.out.println("treeSet " + treeSet);

		Set<Character> linkedHashSet = new LinkedHashSet(characters);
		System.out.println("linkedHashSet " + linkedHashSet);

		Set<Character> hashSet = new HashSet(characters);
		System.out.println("hashSet " + hashSet);
	}

}
