package com.api.a;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.List;

public class FileReWriteRunner {

	public static void main(String[] args) throws IOException {
		Path path = Paths.get("./sources/sample.txt");
		String fileContent = Files.readString(path);
		System.out.println(fileContent);
		String newfileContent = fileContent.replace("sd", "shitballs");

		Path newFilePath = Paths.get("./sources/sample-new.txt");
		Files.writeString(newFilePath, newfileContent);

		var numbs = List.of(1, 5, 6, 8);

		var name = List.of("john", "pedro", "juan");

		var str = """
				"Line 1"
				'Line 2'
				Line 3
				""";

		System.out.println(str);
		System.out.println(numbs);
		System.out.println(name);
	}

}
