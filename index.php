<?php

use GitElephant\Objects\Branch;
use GitElephant\Repository;

include('vendor/autoload.php');

try
{
	$projectsDir = __DIR__ . '/projects/';

	$hostProject = 'https://pjsde:Egcmmb00@bitbucket.org/gpixelteam/tndmloja.git';

	//	$repo = Repository::createFromRemote($hostProject, $projectsDir.'tndmloja', 'git.exe');

	$repo = new Repository($projectsDir.'tndmloja', 'git');

//	$totCommits= $repo->countCommits();

	$log = $repo->getLog('php', null, 100);

	$totCommits = $log->count();
	$totCommits = count($log);

	foreach ($log as $commit) {
		echo $commit->getMessage()."<br>";
	}

	$commit= $repo->getCommit();

	$tree = $repo->getTree( $commit);

#	$php = $repo->checkoutAllRemoteBranches('origin');

	$develop = Branch::checkout($repo, 'php');

#	$remotes = $repo->getRemotes(); // array of Remote objects

	$remoteBranches = $repo->getRemoteBranches(); // return an array of Branch objects

	$branches = ( $repo->getBranches()); // return an array of Branch objects

#	$repo->checkoutRemoteBranch('php');

#	$branches = ( $repo->getBranches()); // return an array of Branch objects

#	$mainBranch = ( $repo->getMainBranch()); // return the Branch instance of the current checked out branch
#	$master = ( $repo->getBranch('master')); // return a Branch instance by its name

#	$php = $repo->checkoutAllRemoteBranches('origin');


	/*
	//	$repo = GitRepository::cloneRepository($hostProject, $projectsDir.'tndmloja');

		$repo = new Cz\Git\GitRepository($projectsDir.'/tndmloja');

		$lastCommitId = $repo->getLastCommitId();

		$lastCommitData = $repo->getCommitData($lastCommitId);

		var_dump($lastCommitData);

		$x = $hostProject;
	*/

}
catch (Exception $e)
{
	echo $e->getMessage();
}
