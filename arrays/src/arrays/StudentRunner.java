package arrays;

import java.math.BigDecimal;

public class StudentRunner {

	public static void main(String[] args) {
		Student student = new Student("mark", new int[] { 5, 9, 15, 11, 7 });

		int number = student.getNumberOfMarks();
		System.out.println(student.getNumberOfMarks());

		int sum = student.getTotalSumOfMarks();
		System.out.println(student.getTotalSumOfMarks());

		int maximumMark = student.getMaximumMark();
		System.out.println(student.getMaximumMark());

		int minimumMark = student.getMinimumMark();
		System.out.println(student.getMinimumMark());

		BigDecimal average = student.getAverageMarks();
		System.out.println(student.getAverageMarks());

		System.out.println(student);

		student.addNewMark(35);

		System.out.println(student);

		student.removeMarkAtIndex(2);

		System.out.println(student);
	}

}
