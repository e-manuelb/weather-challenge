export interface UserWeather {
    id?: string;
    user_id?: string;
    description?: Description;
    synced_at?: string;
    created_at?: string;
    updated_at?: string;
}

interface Description {
    dt?: number;
    id?: number;
    cod?: number;
    sys?: DescriptionSys
    base?: string;
    main?: DescriptionMain;
    name?: string;
    wind?: DescriptionWind;
    coord?: DescriptionCoordinate;
    clouds?: DescriptionClouds;
    weather?: Array<Weather>;
    timezone?: number;
    visibility?: number;
}

interface DescriptionSys {
    sunset?: number;
    sunrise?: number;
}

interface DescriptionMain {
    temp?: number;
    humidity?: number;
    pressure?: number;
    temp_max?: number;
    temp_min?: number;
    sea_level?: number;
    feels_like?: number;
    grnd_level?: number;
}

interface DescriptionWind {
    deg?: number;
    gust?: number;
    speed?: number;
}

interface DescriptionCoordinate {
    lat?: number;
    lon?: number;
}

interface DescriptionClouds {
    all?: number;
}

interface Weather {
    id?: number;
    icon?: string;
    main?: string;
    description?: string;
}
