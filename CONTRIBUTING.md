# How to Contribute to the Google Ads API Client Library for PHP

## Overview: We Welcome Your Contributions

Welcome and thank you for your interest in contributing to the Google Ads API Client Library for
PHP. Open source contributions are important to foster a vibrant developer community and help
us provide a world-class developer experience. We value your contributions, no matter how small.
Even small documentation fixes can go a long way in helping other developers use our API. Before
contributing, please review the guidelines and best practices below.

*  [Providing Feedback](#providing-feedback)
    *  [Feature Requests](#feature-requests)
    *  [Bug Reports](#bug-reports)
*  [Contributing](#contributing)
    *  [Contributor License Agreement (CLA)](#contributor-license-agreement-cla)
    *  [How Libraries are Generated](#how-libraries-are-generated)
    *  [Pull Request Submission Best Practices](#pull-request-submission-best-practices)
    *  [Style Guidelines & Naming Conventions](#style-guidelines--naming-conventions)
    *  [Claiming Requests](#claiming-requests)
    *  [Testing](#testing)
 * [Community Guidelines](#community-guidelines)

## Providing Feedback

This repository is specifically for the Google Ads API Client Library for PHP. If you have feedback
related to the Google Ads API, please submit it by clicking the **Send feedback** button in the top right
corner of [this page](https://developers.google.com/google-ads/api/support).

### Feature Requests

We appreciate your feedback and encourage you to submit feature requests that
will help improve this library.

If you see that someone has already created an issue that describes your proposed feature request,
please upvote their idea to avoid duplicates and help our team prioritize feature requests.
Github provides a similar issues search as you create new issues, which can help in this
effort. In addition, if you have commentary or can build upon someone else’s idea, feel free to
do so by adding a comment.

Please submit feature requests related to **this repository** by creating a new issue using
the [Feature Request](https://github.com/googleads/google-ads-php/issues/new?assignees=&labels=enhancement&template=feature_request.md&title=)
template.

### Bug Reports

We appreciate your feedback and encourage you to report bugs that will help
improve this library.

If you see that someone has already created a bug that describes your bug, please upvote their
issue to avoid duplicates and help our team prioritize feature requests. In addition, if you
have additional commentary that can help us solve the issue, please add a comment with the
relevant information. It may be helpful to provide the request and response logs associated
with your bug.

Please submit bugs related to **this repository** by creating a new issue using the
[Bug](https://github.com/googleads/google-ads-php/issues/new?assignees=&labels=bug&template=bug_report.md&title=)
template.

**Please do not include any personal identifiable information or authorization/access data
in any of the information you post.**

## Contributing

### Contributor License Agreement (CLA)

Contributions to this project must be accompanied by a Contributor License Agreement.
You (or your employer) retain the copyright to your contribution; this simply gives us permission
to use and redistribute your contributions as part of the project. Head over to
https://cla.developers.google.com/ to see your current agreements on file or to sign a new one.

You generally only need to submit a CLA once, so if you've already submitted one (even if it was
for a different project), you probably don't need to do it again.

### How Libraries are Generated

This section is intended to provide background regarding how we generate our client libraries so
that you only submit pull requests that we will be able to use (we don’t want you wasting your
time). We automatically generate the majority of our client library code from these
[protocol buffers](https://github.com/googleapis/googleapis/tree/master/google/ads/googleads)
that define the API. As a result, the names of certain methods and variables may be
created automatically. Generated code is generally located in folders with the name of a
version, such as v1 or v2. We will not be able to accept pull requests for open source
improvements to the codebase related to generated code. Please share any feedback of this
nature by [creating an issue](#providing-feedback) as we may be able to make fixes
to the code generation process internally. We also welcome any pull requests related to
this library not related to generated code.

### Pull Request Submission Best Practices

If your pull request does not address an existing issue, we suggest
[creating an issue](#providing-feedback) outlining your proposed changes to
ensure they align with the existing roadmap and are able to be accepted.
When making a pull request, first make your own forked copy of this repository, make any changes
on a separate branch of that forked copy, then submit the pull request from your new fork/branch.
Consult
[GitHub Help](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/about-pull-requests)
for more information on using pull requests.

All submissions, including submissions by project members, require review. Upon receiving your
pull request, our team will review the changes and may provide you with feedback, questions,
or comments in order to maintain a high level of quality throughout this repository. We ask
that you address feedback in a timely manner so that we can merge your changes into the main branch.

### Style Guidelines & Naming Conventions

Please conform your submitted code to [PSR-12](https://www.php-fig.org/psr/psr-12/).
Assuming that you're at the root directory of your project, to check for coding style violations, run

```
vendor/bin/phpcs src --standard=phpcs_ruleset.xml -np
```

To automatically fix (fixable) coding style violations, run

```
vendor/bin/phpcbf src --standard=phpcs_ruleset.xml
```


### Claiming Requests

If you see a feature request or bug in the issues list for which you would like to submit a pull
request, please let us know by “claiming” the request in the comments, and we can assign the
issue to you. This will help to avoid duplicate work.

### Testing

If you make any changes to this codebase, ensure that all existing tests continue to pass.
In addition, add tests that validate your changes to ensure that future changes do not break
your new feature or bug fix.

## Community Guidelines

This project follows
[Google's Open Source Community Guidelines](https://opensource.google/conduct/).
