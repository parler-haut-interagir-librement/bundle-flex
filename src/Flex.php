<?php

namespace Phil\BundleFlex;

use Composer\Composer;
use Composer\EventDispatcher\Event;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Factory;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\ScriptEvents;
use Phil\BundleFlex\Composer\CommandRunner;
use Phil\BundleFlex\Maker\FlexMaker;

class Flex implements PluginInterface, EventSubscriberInterface
{
    private CommandRunner $commandRunner;
    private FlexMaker $maker;
    private IOInterface $io;

    public static function getSubscribedEvents(): array
    {
        return [
            ScriptEvents::POST_CREATE_PROJECT_CMD => 'onPostCreateProject',
        ];
    }

    public function activate(Composer $composer, IOInterface $io): void
    {
        $this->commandRunner = new CommandRunner($composer);
        $this->maker = new FlexMaker($this->commandRunner, $io, \dirname(Factory::getComposerFile()));
        $this->io = $io;
    }

    public function deactivate(Composer $composer, IOInterface $io): void
    {
        // no-op
    }

    public function uninstall(Composer $composer, IOInterface $io): void
    {
        // no-op
    }

    public function onPostCreateProject(Event $event): void
    {
        $this->removeSkeletonFiles();
        $this->maker->make();
        $this->commandRunner->remove('yceruto/bundle-flex', dev: true);
        $this->writeSuccessMessage();
    }

    private function removeSkeletonFiles(): void
    {
        @unlink('LICENSE');
        @unlink('README.md');
    }

    private function writeSuccessMessage(): void
    {
        $message = <<<EOT

<bg=green;fg=white>                                                                    </>
<bg=green;fg=white> ✨ Your bundle is all set to rock the Symfony world! Happy coding! </>
<bg=green;fg=white>                                                                    </>

EOT;
        $this->io->write($message);
    }
}
