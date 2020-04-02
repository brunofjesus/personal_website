Dates with Swagger and Spring Boot

# [Dates with Swagger and Spring Boot](#) &mdash; 02 April, 2020

When using a date parameter in a API call with a Swagger generated Controller interface I noticed some problems
concerning the date format.
 
I was struggling to find a solution to receive the dates without adding the
`@DateTimeFormat(iso = DateTimeFormat.ISO.DATE_TIME)` annotation to the date parameter, which defeats the purpose of using generated code.

The solution I found [here](https://github.com/swagger-api/swagger-codegen/issues/4113) is to add a formatter
to a `WebMvcConfigurer` class.

**Example:**

```
@Configuration
public class RestConfiguration extends WebMvcConfigurerAdapter {

    @Override
    public void addFormatters(FormatterRegistry registry) {
        DateTimeFormatterRegistrar registrar = new DateTimeFormatterRegistrar();
        registrar.setUseIsoFormat(true);
        registrar.registerFormatters(registry);
    }
}
```