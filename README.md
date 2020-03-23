# Micronative/Sns
[![Software license][ico-license]](LICENSE)
[![Version][ico-version-stable]][link-packagist]
[![Download][ico-downloads-monthly]][link-downloads]
[![Build status][ico-travis]][link-travis]
[![Coverage][ico-codecov]][link-codecov]


[ico-license]: https://img.shields.io/github/license/nrk/predis.svg
[ico-version-stable]: https://img.shields.io/packagist/v/micronative/sns.svg
[ico-downloads-monthly]: https://img.shields.io/packagist/dm/micronative/sns.svg
[ico-travis]: https://travis-ci.com/micronative/sns.svg?branch=master
[ico-codecov]: https://codecov.io/gh/micronative/sns/branch/master/graph/badge.svg

[link-packagist]: https://packagist.org/packages/micronative/sns
[link-codecov]: https://codecov.io/gh/micronative/sns
[link-travis]: https://travis-ci.com/micronative/sns
[link-downloads]: https://packagist.org/packages/micronative/sns/stats

# Description

This project was forked from [enqueue/sns](https://github.com/php-enqueue/sns) and made the following improvements:
+ Move all classes to src
+ Rename Tests to tests
+ Move examples to tests
+ Change namespace to Micronative\Sns

SnsProducer->send():
<pre>
public function send(Destination $destination, Message $message): void
    {
        InvalidDestinationException::assertDestinationInstanceOf($destination, SnsDestination::class);
        InvalidMessageException::assertMessageInstanceOf($message, SnsMessage::class);

        $body = $message->getBody();
        if (empty($body)) {
            throw new InvalidMessageException('The message body must be a non-empty string.');
        }

        $topicArn = $this->context->getTopicArn($destination);

        $arguments = [
            'Message' => $message->getBody(),
            'TopicArn' => $topicArn,
        ];

        if ($message->getProperties()) {
            foreach ($message->getProperties() as $name => $value) {
                $arguments['MessageAttributes'][$name] = ['DataType' => 'String', 'StringValue' => $value];
            }
        }

        if ($message->getMessageAttributes()) {
            foreach ($message->getMessageAttributes() as $name => $value) {
                $arguments['MessageAttributes'][$name] = ['DataType' => 'String', 'StringValue' => $value];
            }
        }

        if (null !== ($structure = $message->getMessageStructure())) {
            $arguments['MessageStructure'] = $structure;
        }
        if (null !== ($phone = $message->getPhoneNumber())) {
            $arguments['PhoneNumber'] = $phone;
        }
        if (null !== ($subject = $message->getSubject())) {
            $arguments['Subject'] = $subject;
        }
        if (null !== ($targetArn = $message->getTargetArn())) {
            $arguments['TargetArn'] = $targetArn;
        }

        $result = $this->context->getSnsClient()->publish($arguments);

        if (false == $result->hasKey('MessageId')) {
            throw new \RuntimeException('Message was not sent');
        }

        $message->setSnsMessageId((string) $result->get('MessageId'));
    }
</pre>
