package loops;

public class StringRunner {

	public static void main(String[] args) {
		String[] daysOfWeek = { "Saturday", "Monday", "Tuesday", "wed", "thursdayy", "Fridayyyyyyy", "Saturday" };

		String max = "";
		for (String day : daysOfWeek) {
			if (day.length() > max.length()) {
				max = day;
			}
		}
		System.out.println(max);
	}


}
