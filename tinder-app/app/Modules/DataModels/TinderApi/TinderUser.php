<?php

namespace App\Modules\DataModels\TinderApi;


use Carbon\Carbon;

class TinderUser
{
    protected string|null $id = null;

    protected string|null $recType = null;

    protected array|null $badges = null;

    protected string|null $bio = null;

    protected Carbon|null $birthdayDate = null;

    protected string|null $name = null;

    protected int|null $gender = null;

    protected array|null $jobs = null;

    protected bool|null $recentlyActive = null;

    protected array|null $photos = [];

    /**
     * @param array $data
     *
     * @return $this
     */
    public static function fromArray(array $data): self
    {
        $data = collect($data);

        return (new self())->setId($data->get('_id'))
            ->setBadges($data->get('badges'))
            ->setBio($data->get('bio'))
            ->setBirthdayDate(Carbon::parse($data->get('birth_date')))
            ->setName($data->get('name'))
            ->setRecentlyActive($data->get('recently_active'))
            ->setPhotos(collect($data->get('photos'))->pluck('url')->toArray());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'recType' => $this->recType,
            'bio' => $this->bio,
            'birthdayDate' => $this->birthdayDate,
            'name' => $this->name,
            'gender' => $this->gender,
            'jobs' => $this->jobs,
            'photos' => $this->photos
        ];
    }

    /**
     * @return array|null
     */
    public function getPhotos(): ?array
    {
        return $this->photos;
    }

    /**
     * @param array|null $photos
     * @return TinderUser
     */
    public function setPhotos(?array $photos): TinderUser
    {
        $this->photos = $photos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return TinderUser
     */
    public function setId(?string $id): TinderUser
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecType(): ?string
    {
        return $this->recType;
    }

    /**
     * @param string|null $recType
     * @return TinderUser
     */
    public function setRecType(?string $recType): TinderUser
    {
        $this->recType = $recType;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getBadges(): ?array
    {
        return $this->badges;
    }

    /**
     * @param array|null $badges
     * @return TinderUser
     */
    public function setBadges(?array $badges): TinderUser
    {
        $this->badges = $badges;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @param string|null $bio
     * @return TinderUser
     */
    public function setBio(?string $bio): TinderUser
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getBirthdayDate(): ?Carbon
    {
        return $this->birthdayDate;
    }

    /**
     * @param Carbon|null $birthdayDate
     * @return TinderUser
     */
    public function setBirthdayDate(?Carbon $birthdayDate): TinderUser
    {
        $this->birthdayDate = $birthdayDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return TinderUser
     */
    public function setName(?string $name): TinderUser
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGender(): ?int
    {
        return $this->gender;
    }

    /**
     * @param int|null $gender
     * @return TinderUser
     */
    public function setGender(?int $gender): TinderUser
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getJobs(): ?array
    {
        return $this->jobs;
    }

    /**
     * @param array|null $jobs
     * @return TinderUser
     */
    public function setJobs(?array $jobs): TinderUser
    {
        $this->jobs = $jobs;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRecentlyActive(): ?bool
    {
        return $this->recentlyActive;
    }

    /**
     * @param bool|null $recentlyActive
     * @return TinderUser
     */
    public function setRecentlyActive(?bool $recentlyActive): TinderUser
    {
        $this->recentlyActive = $recentlyActive;
        return $this;
    }
}
